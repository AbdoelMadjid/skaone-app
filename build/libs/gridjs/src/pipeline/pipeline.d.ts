import { PipelineProcessor, ProcessorType } from './processor';
import { EventEmitter } from '../util/eventEmitter';
interface PipelineEvents<R> {
    updated: <T, P>(processor: PipelineProcessor<T, P>) => void;
    afterRegister: () => void;
    propsUpdated: () => void;
    afterProcess: (prev: R) => void;
    error: <T>(prev: T) => void;
}
declare class Pipeline<R> extends EventEmitter<PipelineEvents<R>> {
    private readonly _steps;
    private cache;
    private lastProcessorIndexUpdated;
    constructor(steps?: PipelineProcessor<unknown, unknown>[]);
    clearCache(): void;
    register<T, P>(processor: PipelineProcessor<T, P>, priority?: number): PipelineProcessor<T, P>;
    tryRegister<T, P>(processor: PipelineProcessor<T, P>, priority?: number): PipelineProcessor<T, P> | undefined;
    unregister<T, P>(processor: PipelineProcessor<T, P>): void;
    private addProcessorByPriority;
    get steps(): PipelineProcessor<unknown, unknown>[];
    getStepsByType(type: ProcessorType): PipelineProcessor<unknown, unknown>[];
    private getSortedProcessorTypes;
    process(data?: R): Promise<R>;
    private findProcessorIndexByID;
    private setLastProcessorIndex;
    private processorPropsUpdated;
    private afterRegistered;
}
export default Pipeline;
